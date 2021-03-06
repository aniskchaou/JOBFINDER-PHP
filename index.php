<?php

//initialisations
include_once 'config/init.php';
require_once 'lib/Job.php';
require_once 'lib/Category.php';
require_once 'lib/DataBase.php';

$template = new Template('templates/list-job.php');
$job=new Job;

//find job by category
$category_param=isset($_GET['category'])?$_GET['category']:null;
if($category_param)
{
    $template->jobs=$job->getByCategory($category_param);
    $template->title="JobFinder";
}else
{
    $template->title="JobFinder";
    $template->jobs=$job->fetchAll();
}

//delete a job by id
$del_id=isset($_GET['del_id'])?$_GET['del_id']:null;
if($del_id)
{
    $job->delete($del_id);
    $_SESSION['msg']="Your job has been deleted !";
    redirect("index.php", false);
}






$category=new Category;
$template->categories=$category->fetchAll();



echo $template;

?>