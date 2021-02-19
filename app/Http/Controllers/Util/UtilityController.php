<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UtilityController extends Controller
{
    public static function utilRoutes()
    {
        Route::get('/open_utility', [UtilityController::class, 'open_utility'])->name('open_utility');
        Route::get('/make_controller', [UtilityController::class, 'to_make_controller'])->name('to_make_controller');
        Route::get('/make:controller', [UtilityController::class, 'make_controller'])->name('make:controller');
        Route::get('/make_migration_create', [UtilityController::class, 'to_make_migration_create'])->name('to_make_migration_create');
        Route::get('/make_migration_table', [UtilityController::class, 'to_make_migration_table'])->name('to_make_migration_table');
        Route::get('/migrate', [UtilityController::class, 'migrate'])->name('migrate');
        Route::get('/make:migration-create', [UtilityController::class, 'make_migration_create'])->name('make:migration-create');
        Route::get('/make:migration-table', [UtilityController::class, 'make_migration_table'])->name('make:migration-table');
        Route::get('/migrate:fresh', [UtilityController::class, 'migrate_fresh'])->name('migrate:fresh');
        Route::get('/clear_cache_config', [UtilityController::class, 'clear_cache_config'])->name('clear_cache_config');
        Route::get('/make_seeder', [UtilityController::class, 'to_make_seeder'])->name('to_make_seeder');
        Route::get('/make:seeder', [UtilityController::class, 'make_seeder'])->name('make:seeder');
        Route::get('/seed', [UtilityController::class, 'seed'])->name('seed');
        Route::get('/done/{str}', [UtilityController::class, 'done'])->name('done');
    }

    public function done($str)
    {
        return $this->styleBody() . '
        <div class="item">
        Done<span id="wait">...</span>
        </div>
        '
        .
        header("REFRESH:2;" . route($str))

        ;
    }

    public function open_utility()
    {
        $controller = route('to_make_controller');
        $migration_create = route('to_make_migration_create');
        $migration_table = route('to_make_migration_table');
        $migrate = route('migrate');
        $fresh = route('migrate:fresh');
        $seeder = route('to_make_seeder');
        $seed = route('seed');
        $clear = route('clear_cache_config');

        return $this->styleBody() . '
            <div class="parent">
                <form action="' . $migration_create . '" method="GET">
                     <button type="submit">Create Migration</button>
                </form>
                <br>
                <form action="' . $migration_table . '" method="GET">
                     <button type="submit">Modify Migration</button>
                </form>
                <br/>
                <form action="' . $controller . '" method="GET">
                    <button type="submit">Make Controller</button>
                </form>
                <br/>
                <form action="' . $seeder . '" method="GET">
                    <button type="submit">Make Seeder</button>
                </form>
                <br/>
                <form action="' . $migrate . '" method="GET" onsubmit="return confirm(`Do you really want to migrate tables?`);">
                    <button type="submit">Run Migration</button>
                </form>
                <br/>
                <form action="' . $seed . '" method="GET" onsubmit="return confirm(`Do you really want to seed data inside database?`);">
                    <button type="submit">Run Seeder</button>
                </form>
                <br/>
                <form action="' . $fresh . '" method="GET" onsubmit="return confirm(`Do you really want to !!((migrate fresh))!! ?`);">
                    <button type="submit">Run Fresh Migration</button>
                </form>
                <br/>
                <form action="' . $clear . '" method="GET" onsubmit="return confirm(`Do you really want to clear config and cache ?`);">
                    <button type="submit">Run Clear</button>
                </form>
                </div>
    ';
    }
    public function to_make_controller()
    {
        $action = route('make:controller');
        return
        $this->styleBody() . $this->styleForm() .
        '
                <form action="' . $action . '" method="GET">
                    <legend>Make Controller</legend>
                    <fieldset>
                        <label for="controller">Controller Name :</label>
                        <input type="text" id="controller" name="controller" />
                        <br/>
                        <label for="resource"><input type="checkbox" id="resource" name="resource" /> Resource</label>
                        <br/>
                        <input type="submit" value="Add" />
                    </fieldset>
                </form>
                <a href="' . route('open_utility') . '" class="back">back to Open Util</a>
                ';
    }

    public function make_controller()
    {
        $controller = strtolower(Request()->get('controller'));
        $controller = ucwords($controller);
        if (strpos($controller, "controller")) {
            $controller = str_replace('controller', 'Controller', $controller);
        } else {
            $controller .= 'Controller';
        }
        if (Request()->get('resource') == 'on') {
            Artisan::call('make:controller ' . $controller . ' --resource');
        } else {
            Artisan::call('make:controller ' . $controller);
        }
        return redirect()->route('done', 'to_make_controller');
    }

    public function to_make_migration_create()
    {
        $action = route('make:migration-create');
        return $this->styleBody() . $this->styleForm() . '
                <form action="' . $action . '" method="GET">
                    <legend>Make Migration</legend>
                    <fieldset>
                        <label for="migration">Table Name :</label>
                        <input type="text" id="migration" name="migration" />
                        <br/>
                        <input type="submit" value="Add" />

                    </fieldset>
                </form>
                <a href="' . route('open_utility') . '" class="back">back to Open Util</a>
            ';
    }
    public function to_make_migration_table()
    {
        $action = route('make:migration-table');
        $tables = DB::select('SHOW TABLES');
        $databaseName = DB::connection()->getDatabaseName();
        
        $options = "";
        $excludes = ['failed_jobs', 'migrations', 'password_resets', 'personal_access_tokens', 'sessions'];

        foreach ($tables as $table) {
            $table=get_object_vars($table);
            if (!in_array($table['Tables_in_'.$databaseName], $excludes)) {
                $options .= '<option>' . $table['Tables_in_'.$databaseName] . '</option>';
            }
        }
        return $this->styleBody() . $this->styleForm() . '
                <form action="' . $action . '" method="GET">
                    <legend>Make Migration</legend>
                    <fieldset>
                        <label>Columns Name :</label>
                        <input name="name" placeholder="insert name of added columns"/>
                        <br/>
                        <label>Table Name :</label>
                        <select name="migration">
                        ' . $options . '
                        </select>
                        <br/>
                        <input type="submit" value="Add" />

                    </fieldset>
                </form>
                <a href="' . route('open_utility') . '" class="back">back to Open Util</a>

            ';
    }

    public function make_migration_create()
    {
        $table = Request()->get('migration');

        Artisan::call('make:migration create_' . $table . '_table --create ' . $table);
        Artisan::call('make:model ' . $this->getmodelName($table));

        return redirect()->route('done', 'to_make_migration_create');
    }
    public function make_migration_table()
    {
        $name = Request()->get('name');
        $table = Request()->get('migration');

        Artisan::call('make:migration add_' . $this->getColumnsName($name) . '_' . $table . ' --table ' . $table);

        return redirect()->route('done', 'to_make_migration_table');
    }

    public function migrate()
    {
        Artisan::call('migrate');
        return redirect()->route('done', 'open_utility');
    }

    public function clear_cache_config()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        // return redirect()->route('done', 'open_utility');
        return redirect()->back();
    }
    public function migrate_fresh()
    {
        Artisan::call('migrate:fresh');
        return redirect()->route('done', 'open_utility');
    }
    public function to_make_seeder()
    {
        $action = route('make:seeder');
        return $this->styleBody() . $this->styleForm() . '
                <form action="' . $action . '" method="GET">
                    <legend>Make Seeder</legend>
                    <fieldset>
                        <label for="seeder">Seeder Name :</label>
                        <input type="text" id="seeder" name="seeder" />
                        <br/>

                        <input type="submit" value="Add" />

                    </fieldset>
                </form>
                <a href="' . route('open_utility') . '" class="back">back to Open Util</a>

    ';

    }
    public function make_seeder()
    {
        $seeder = strtolower(Request()->get('seeder'));
        $seeder = ucwords($seeder);
        if (strpos($seeder, "seeder")) {
            $seeder = str_replace('seeder', 'Seeder', $seeder);
        } else {
            $seeder .= 'Seeder';
        }
        Artisan::call('make:seeder ' . $seeder);
        return redirect()->route('done', 'to_make_seeder');
    }

    public function seed()
    {
        Artisan::call('db:seed');
        return redirect()->route('done', 'open_utility');
    }

    public function getmodelName($str)
    {
        $str1 = explode('_', $str);
        $model = "";
        foreach ($str1 as $item) {
            $model .= ucwords(strtolower($item));
        }
        if (substr($model, strlen($model) - 1) == 's') {
            return substr($model, 0, strlen($model) - 1);
        } else {
            return $model;
        }
    }

    public function getColumnsName($str)
    {
        $str1 = str_replace([' ', ',', '/', '&'], '_', $str);
        return $str1;
    }
    public function styleForm()
    {
        return '
    <style>
    form{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        width:50%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form *{
        margin:10px;
        padding:5px;
    }
    legend{
        position:absolute;
        top:-20%;
        color:red
    }
    fieldset{
        border-radius:10px;
        background: #ccc;
        box-shadow:rgba(10,10,10,.5) 10px 10px
    }

    .back,.back:active,.back:visited,.back:hover{
        position:absolute;
        top:10%;
        left:50%;
        transform:translateX(-50%);
    }

    .back:link, .back:visited {
        background-color: transparent;
        border:2px solid;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
      }

      .back:hover, .back:active {
        background-color: white;
        color:#333;
      }
    </style>
    ';
    }

    public function styleBody()
    {
        return '
        <style>
        body{
            background:#333;
        }
        body::after{
            content: " .";
            position:absolute;
            top:5%;
            left:5%;
            color:transparent;
            border-radius:50%;
            background-image: linear-gradient(to right, #fff , #ccc);
            width:100px;
            height:100px;
            box-shadow:0 0 10px 20px rgba(200,200,200,.2) ;
        }
        .parent{
            display:flex;
            width:60%;
            justify-content:space-between;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            border:1px solid gray;
            border-radius:25px;
            padding:50px;
            box-shadow:rgba(10,10,10,.5) 10px 10px;
            background: #ccc;
        }
        button{
            cursor:pointer;
            padding:10px;
        }
        .item{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            font-size:50px;
            color:white;
        }
#wait{
color:white;
font-size:50
}
        </style>
        ';
    }

}
