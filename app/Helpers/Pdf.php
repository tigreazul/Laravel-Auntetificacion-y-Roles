<?php 

require_once('fpdf181/fpdf.php');
class Pdf extends FPDF{

    var $B;
    var $I;
    var $U;
    var $HREF;

    // public function  saludo(){
    //     return 'holass';
    // }

    //Función para escribir en código HTML y que se detecten las etiquetas
    function WriteHTML($html)
    {
        // Intérprete de HTML
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Etiqueta
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extraer atributos
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Etiqueta de apertura
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Etiqueta de cierre
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modificar estilo y escoger la fuente correspondiente
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Escribir un hiper-enlace
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }



    function Header(){
        
        // Logo	
        // $this->Image(url('images/logo.jpg'),10,10,18);//ancho,alto

        //$this->MultiCell(42, 5, 'Superintendencia Nacional de Bienes Estatales', 0, 1);
        $this->SetFont('Arial','',9);
        
        $this->Ln(0);
        $this->Cell(19);
        $this->Cell(1,1,'',0,0,'L');
        
        $this->Cell(294,1,utf8_decode('Página : ').$this->PageNo().'/{nb}',0,0,'C');
        $this->Ln(4);
        $this->Cell(19);
        $this->Cell(1,1,'',0,0,'L');
        $this->Cell(300,1,utf8_decode('Reporte : '.date('d/m/Y')),0,0,'C');
        
        //$this->MultiCell(42, 5, 'Superintendencia Nacional de Bienes Estatales', 0, 1);
        
        $this->Cell(150);
        
        
        //$this->Ln(-1);
        $this->SetFont('Arial','B',15);		
        $this->Ln(-5);
        //$this->Cell(18);
        $this->Cell(0,1,utf8_decode('Lista de Reportes'),0,0,'C');
        
        $this->Ln(6);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,'SYS.COBRANZA',0,0,'C');
        

        //Dibujamos una linea
        $this->Line(10, 20, 196, 20);
        // Salto de línea
        $this->Ln(5);
            
    }
    
    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-44);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,utf8_decode('Página : ').$this->PageNo().'/{nb}',0,0,'R');
        
        $this->Ln();
        $this->Ln(8);
        
        // $this->Cell(5);
        // $this->Cell(1,1,'_______________________________________________',0,0,'L');	
        
        // $this->Ln(5);
        
        // $this->Cell(10);
        // $this->Cell(1,1,'Firma y sello del responsable de Control Patrimonial',0,0,'L');
        
    }
    
        
}
?>