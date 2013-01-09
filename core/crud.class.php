<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午4:33
 * To change this template use File | Settings | File Templates.
 */
interface CRUD
{
  function lists($start,$pagecount);
  function read($id);
  function insert($array);
  function update($array,$condition);
  function del($id);
  function num_rows();
}
