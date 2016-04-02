<?php

/**
 * Created by PhpStorm.
 * User: mkordic
 * Date: 28.02.16.
 * Time: 15:55
 */
class ItemsController extends AppController{


    public function add(){
   if($this->request->is('post'))
   {
       $this->Item->create();
       if($this->Item->save($this->request->data))
       {
       $this->redirect('index');
       }
       else {

       }
   }}

    public function view($id = null)
    {
        if(!$id){
            throw new NotFoundException(__("ID was not set."));
        }
        $data=$this->Item->findById($id);

        if(!$data)
        {
            throw new NotFoundException(__("ID is not in the Database"));
        }
        $this->set('item',$data);
    }

    public function index()
    {
        $data = $this->Item->find('all',array('order' =>'length'));
        $count = $this->Item->find('count');
        //$this->set('items',$data);
        //$this->set('count',$count);
        $info = array(
            'items'=> $data,
            'count'=> $count
        );
        $this->set($info);
    }

}

?>