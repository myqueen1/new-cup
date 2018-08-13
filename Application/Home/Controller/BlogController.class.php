<?php
/**
 *   @author yanxusheng
 *   @datatime 18-08-07
*/
namespace Home\Controller;

use Think\Controller;

class BlogController extends ComeController
{
	/**
	 *  @params
	 *  @return 
	*/
	public function Blog()
    {
		$this->display();
	}

	/**
     *   @params  
    */
    public function Blog_list(){
        $this->display();
    }
}
?>