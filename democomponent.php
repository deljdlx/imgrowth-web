<?php
require(__DIR__.'/bootstrap.php');


$autoloader=new \Elbiniou\Dashboard\Autoloader();
$autoloader->addNamespace('Elbiniou\Dashboard', __DIR__.'/vendor/elbiniou-dashboard/source/class');
$autoloader->register();





$test=new \Elbiniou\Dashboard\Component\CardPanel();

/*
echo $test->render(null, array(
    'title'=>'hello world'
));
die('EXIT '.__FILE__.'@'.__LINE__);
*/

ob_start();
include(__DIR__.'/template/test3/index.php');
$template=ob_get_clean();


if(isset($_GET['debug'])) {
    \Elbiniou\Dashboard\Component\CircleGauge::setStaticRenderer(function($buffer, $instance) {
        //$renderer=new \Elbiniou\Dashboard\Component\Renderer\Debug();
        $renderer=new \Elbiniou\Dashboard\Renderer\RichEdit();
        return $renderer->render($buffer, $instance);
    });



    \Elbiniou\Dashboard\Component\CardPanel::setStaticRenderer(function($buffer, $instance) {
        //$renderer=new \Elbiniou\Dashboard\Component\Renderer\Debug();
        $renderer=new \Elbiniou\Dashboard\Renderer\RichEdit();
        return $renderer->render($buffer, $instance);
    });


}




$test=new \Phi\Component\Page($template);


$test->registerComponent('db-checkbox', '\Elbiniou\Dashboard\Component\Input\Checkbox');
$test->registerComponent('db-toggle', '\Elbiniou\Dashboard\Component\Input\Toggle');
$test->registerComponent('db-radio', '\Elbiniou\Dashboard\Component\Input\Radio');
$test->registerComponent('db-input', '\Elbiniou\Dashboard\Component\Input\Input');



$test->registerComponent('db-notification-info', '\Elbiniou\Dashboard\Component\Notification\Info');
$test->registerComponent('db-notification-success', '\Elbiniou\Dashboard\Component\Notification\Success');
$test->registerComponent('db-notification-warning', '\Elbiniou\Dashboard\Component\Notification\Warning');
$test->registerComponent('db-notification-error', '\Elbiniou\Dashboard\Component\Notification\Error');







$test->registerComponent('db-cardpanel', '\Elbiniou\Dashboard\Component\CardPanel');

$test->registerComponent('db-panel', '\Elbiniou\Dashboard\Component\Panel');
$test->registerComponent('db-dropdownmenu', '\Elbiniou\Dashboard\Component\DropDownMenu');

$test->registerComponent('db-button', '\Elbiniou\Dashboard\Component\Button');

$test->registerComponent('db-list', '\Elbiniou\Dashboard\Component\ItemList');


$test->registerComponent('db-barchart', '\Elbiniou\Dashboard\Component\BarChart');
$test->registerComponent('db-donutchart', '\Elbiniou\Dashboard\Component\DonutChart');


$test->registerComponent('db-circlegauge', '\Elbiniou\Dashboard\Component\CircleGauge');



$test->registerComponent('db-dialog', '\Elbiniou\Dashboard\Component\Dialog');


$test->registerComponent('db-datepicker', '\Elbiniou\Dashboard\Component\DatePicker');


$test->registerComponent('db-richeditor', '\Elbiniou\Dashboard\Component\RichEditor');



$test->registerComponent('db-card-accordion', '\Elbiniou\Dashboard\Component\Card\Accordion');

$test->registerComponent('db-card-3-footer', '\Elbiniou\Dashboard\Component\Card\ThreeFooter');

$test->registerComponent('db-card-rounded', '\Elbiniou\Dashboard\Component\Card\RoundedImage');
$test->registerComponent('db-card-flipping', '\Elbiniou\Dashboard\Component\Card\Flipping');




$test->registerComponent('db-pagination', '\Elbiniou\Dashboard\Component\Pagination');

$test->registerComponent('db-label', '\Elbiniou\Dashboard\Component\Label');




//<a href="javascript:void(0)" class="btn btn-raised active"><code>.active</code></a>

header('Content-type: text/html; charset=utf-8');

echo $test->render();



die('EXIT '.__FILE__.'@'.__LINE__);


$router = new \Phi\Routing\Router();
$application->setRouter($router);




$router->get('node/water', '`/node/water(\d)`', function ($index) use ($application) {
    header('Content-type: application/json');
    $content = file_get_contents('http://192.168.0.15/node/water'.$index);
    echo $content;
});






$router->get('node/getConfiguration', '`/node/getConfiguration`', function () use ($application) {

    $content = file_get_contents('http://192.168.0.15/node/getConfiguration');
    header('Content-type: application/json');
    echo $content;
});











$router->get('getCpnfiguration', '`/server/getConfiguration`', function () use ($application) {

    $data =array(
        "time" => time(),
        "date" => date('Y-m-d H:i'),
        "version" => "0.0.1",
        "humidity" => array(
            0 => 4000,
            1 => 4000,
            2 => 4000,
            3 => 4000
        )
    );
    header('Content-type: application/json');
    echo json_encode($data);
});










$router->get('initialize', '`/initialize`', function () use ($application) {
    $storage = $application->getContainer()->get('storage');
    $storage->initialize();
    return true;
});


$router->get('reset', '`/reset`', function () use ($application) {
    $storage = $application->getContainer()->get('storage');
    $storage->reset();
    return true;

});


$router->get('declare', '`/declare`', function () use ($application) {


    $ip = $_SERVER['REMOTE_ADDR'];
    $nodeDataURI = $_GET['dataURI'];
    $nodeVersion = $_GET['nodeVersion'];


    $storage = $application->getContainer()->get('storage');


    $node = new \ImGrowth\Entity\Node();
    $node->setValues(array(
        'ip' => $ip,
        'ping_time' => date('Y-m-d H:i:s'),
        'data_uri' => $nodeDataURI,
        'version' => $nodeVersion,
    ));

    $storage->storeNode($node);

    print_r($node);
});


$router->get('node/data', '`/node/data`', function () use ($application) {


});



$router->get('info', '`/info`', function () use ($application) {

    $data =array(
        "time" => time(),
        "date" => date('Y-m-d H:i'),
        "version" => "0.0.1",

    );
    header('Content-type: application/json');
    echo json_encode($data);
});









$router->get('getNodeData', '`/getNodeData`', function () use ($application) {

    $storage = $application->getContainer()->get('storage');
    $nodes = $storage->getAllNodes();


    $nodesData = array();

    foreach ($nodes as $node) {
        $data = $node->getData();

        $nodeRecord=$application->getContainer()->get('nodeRecord');

        $nodesData[] = array(
            'node' => $node,
            'data' => $data
        );

        $nodeRecord->setValue('data', json_encode($data));
        $nodeRecord->setNode($node);
        $nodeRecord->store();
    }

    echo json_encode($nodesData);


    return true;

});


$application->run();

echo $application->getOutput();

