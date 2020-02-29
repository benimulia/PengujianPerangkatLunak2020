<?php

class Testing4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        $test_name = 'tes if else 1.1';
        $this->unit->run($this->ifelse(null,'halo'),'halo',$test_name);

        $test_name = 'tes if else 1.2';
        $this->unit->run($this->ifelse('tes',null),'tes',$test_name);

        $test_name = 'tes if else 1.3';
        $this->unit->run($this->ifelse('tes','halo'),'tes',$test_name);

        $test_name = 'tes if else 1.4';
        $this->unit->run($this->ifelse(null,null),'Something wrong. Please contact US',$test_name);

        $test_name = 'tes if else 1.4';
        $this->unit->run($this->ifelse('tes'),'tes',$test_name);        

        $test_name = 'tes if else 2.1';
        $this->unit->run($this->ifelse2('andi'),'dia adalah teman saya',$test_name);  

        $test_name = 'tes if else 2.2';
        $this->unit->run($this->ifelse2(null),'dia bukan teman saya',$test_name);        

        $test_name = 'tes if else 2.3';
        $this->unit->run($this->ifelse2('beni'),'dia bukan teman saya',$test_name);  

        //$test_name = 'tes if else 2.4';
        //$this->unit->run($this->ifelse2(),'ERROR',$test_name);  

        $test_name = 'tes if else 3.1';
        $this->unit->run($this->ifelse3(null,null,'sasa'),'sasa',$test_name);   

        $test_name = 'tes if else 3.2';
        $this->unit->run($this->ifelse3(null,'ary','beni'),'ary',$test_name); 

        $test_name = 'tes if else 3.3';
        $this->unit->run($this->ifelse3(null,null,null),'Something wrong. Please contact US',$test_name); 

        $test_name = 'tes if else 3.4';
        $this->unit->run($this->ifelse3('beni',null,null),'beni',$test_name);              

        $test_name = 'tes if else 3.5';
        $this->unit->run($this->ifelse3('beni','ary',null),'beni',$test_name);   

        $test_name = 'tes if else 3.6';
        $this->unit->run($this->ifelse3('beni',null,'ary'),'beni',$test_name); 

        $test_name = 'tes if else 3.7';
        $this->unit->run($this->ifelse3(null,'beni',null),'beni',$test_name); 

        $test_name = 'tes if else 3.8';
        $this->unit->run($this->ifelse3('beni','ary','candra'),'beni',$test_name); 

        //$test_name = 'tes if else 3.9';
        //$this->unit->run($this->ifelse3('candra'),'candra',$test_name); 

        $test_name = 'tes if else 4.1';
        $this->unit->run($this->ifelse4(),'Have a nice Tuesday!',$test_name);  

        $test_name = 'tes if else 4.2';
        $this->unit->run($this->ifelse4('d'),'FAILED',$test_name);      

        $test_name = 'tes if else 4.3';
        $this->unit->run($this->ifelse4('FRI'),'FAILED',$test_name);  

        $test_name = 'tes if else 4.4';
        $this->unit->run($this->ifelse4(null),'FAILED',$test_name);  

        $test_name = 'tes if else 4.5';
        $this->unit->run($this->ifelse4(1),'FAILED',$test_name);  

        $test_name = 'tes loop 1';
        $this->unit->run($this->loop1(1),2048,$test_name);

        $test_name = 'tes loop 1.2';
        $this->unit->run($this->loop1(null),'',$test_name);

        $test_name = 'tes loop 2.1';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        $test_name = 'tes loop 2.2';
        $arr = array(1,1,1,1,1);
        $this->unit->run($this->loop2($arr),3,$test_name); //FAILED


        $test_name = 'tes loop 2.3';
        $arr = array(null);
        $this->unit->run($this->loop2($arr),0,$test_name);

        //$test_name = 'tes loop 2.4';
        //$this->unit->run($this->loop2(),'ERROR',$test_name);

        $test_name = 'tes loop 2.5';
        $arr = array();
        $this->unit->run($this->loop2($arr),0,$test_name);


        $test_name = 'tes loop 3.1';
        $this->unit->run($this->loop3(1),2048,$test_name);

        $test_name = 'tes loop 3.2';
        $this->unit->run($this->loop3(null),null,$test_name);

        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var;
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
