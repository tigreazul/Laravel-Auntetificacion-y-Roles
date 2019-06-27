<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
// use App\Helpers\Views;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        $a_data_page = array(
            'title' => 'Panel de administración - Dashboard',
            'enviroment'  => self::enviroment(),
            'dependencies'    => self::dependencies()
        );

        return \Views::admin('dashboard.index',$a_data_page);
    }

    public static function enviroment()
    {
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        return $envs;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        // Admin::script("$('.dependencies').slimscroll({height:'510px',size:'3px'});");

        return $dependencies;
    }

}
