<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
/*
 *
 *   LIBRERIA data empresa: PERMITE retornar informacion de la empresa
 *   version 1.0
*/
class Templates {
    
    /******************************************************************/
    /** @Funtiones que permiten mostrar formularios pora 
        el ingreso de datos
    /******************************************************************/
    function add_alergias()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_patologias()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }


    function add_medicamentos()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_vacunas()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }

    function add_tratamientos()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }
    
    function add_diagnosticos()
    {
        $html = '<div class="ibox-content"> ';
        $html.= '    <form class="form-horizontal"> ';
        $html.= '                <p>Sign in today for more expirience.</p> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Email</label> ';
        $html.= '            <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control">  ';
        $html.= '               <span class="help-block m-b-none">Example block-level help text here.</span> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"><label class="col-lg-2 control-label">Password</label> ';
        $html.= '        <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control"></div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <div class="i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '        <div class="form-group"> ';
        $html.= '            <div class="col-lg-offset-2 col-lg-10"> ';
        $html.= '                <button class="btn btn-sm btn-white" type="submit">Sign in</button> ';
        $html.= '            </div> ';
        $html.= '        </div> ';
        $html.= '    </form> ';
        $html.= '</div> ';
                   
        return $html;
    }
        
}
