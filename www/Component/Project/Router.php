<?php

namespace ImGrowth\Component\Project;


use Phi\Application\Application;
use \Phi\Routing\Router as PhiRouter;


class Router extends PhiRouter
{
    private $application;



    public function __construct(Application $application)
    {
        $this->application = $application;


        $this->post('create', '`/save`', function () use ($application) {

            $posts = $this->request->post();

            $projectName = $posts['name'];
            $projectDescription =  $posts['description'];

            $photoData = $posts['image'];

            $category = $application->get('wordpress')->get('projectCategory');

            $controller = new Controller($application);

            $imageFile = $controller->saveImageBuffer(APPLICATION_ROOT."/www/upload/photo/", $photoData);

            $data = $controller->create(
                $projectName,
                $projectDescription,
                $imageFile,
                $category->id
            );

            echo json_encode($data);

        })->json();


        $this->post('addImage', '`/addImage`', function () use ($application) {

            $posts = $this->request->post();

            $legend = $posts['legend'];
            $projectId = $posts['projectId'];
            $photoData = $posts['image'];



            /*
            $controller = new Controller($application);
            $data=$controller->getProjectById($projectId);
            echo json_encode($data);
            return;
            */


            $controller = new Controller($application);
            $imageFile = $controller->saveImageBuffer(APPLICATION_ROOT."/www/upload/photo/", $photoData);

            $data = $controller->addPhoto(
                $projectId,
                $imageFile,
                $legend
            );

            echo json_encode($data);





        })->json();


        $this->get('timeline', '`/timeline/(\d+)`', function($projectId) use ($application) {
            $apiURL = $application->get('wordpress')->get('APIURL');
            $sourceURL = $apiURL.'/posts?categories=25';
            $json = file_get_contents($sourceURL);
            echo $json;
        })->json();


        $this->get('api/timeline', '`/api/timeline/(\d+)`', function($projectId) use ($application) {
            $apiURL = $application->get('wordpress')->get('APIURL');
            $sourceURL = $apiURL.'/posts?categories=25';
            $json = file_get_contents($sourceURL);
            echo $json;
        })->json();





        $this->get('list', '`/api/list`', function() use ($application) {

            $apiURL = $application->get('wordpress')->get('APIURL');

            $projectCategory = $application->get('wordpress')->get('projectCategory');

            $projectCategoryId = $projectCategory->id;

            $urlGetProjects = $apiURL.'/categories?parent='.$projectCategoryId;
            $categories=json_decode(file_get_contents($urlGetProjects));

            $idList = [];
            $projects = [];
            foreach ($categories as $project) {
                $idList[] = $project->id;
                $projects[$project->id] = $project;
            }

            $getArticleURL = $apiURL.'/posts?categories='.implode(',', $idList);

            $data = json_decode(
                file_get_contents($getArticleURL)
            );


            $articlePerRubrique = [];
            foreach ($data as $article) {
                $articleProjectIdList = array_intersect($idList, $article->categories);
                $articleProjectId = current($articleProjectIdList);

                if(!isset($articlePerRubrique[$articleProjectId])) {
                    $articlePerRubrique['project-'.$articleProjectId] = array(
                        'category' => $projects[$articleProjectId],
                        'article' => $article
                    );
                }
            }

            echo json_encode($articlePerRubrique);

        })->json();

    }



}

