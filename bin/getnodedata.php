<?php

require(__DIR__.'/../bootstrap.php');


$storage = $application->getContainer()->get('storage');
while(true) {



    echo"\n\n".date('Y-m-d H:i')."===================================================\n\n";

    $nodes = $storage->getAllNodes();
    $nodesData = array();


    foreach ($nodes as $node) {
        $data = $node->getData();

        $nodeRecord=$application->getContainer()->get('nodeRecord');

        /*
        $nodeRecord = new \ImGrowth\Entity\NodeRecord();
        $nodeRecord->setStorage(new \ImGrowth\Storage\NodeRecord($application->getContainer()->get('database')));
        */

        $nodesData[] = array(
            'node' => $node,
            'data' => $data
        );

        $nodeRecord->setValue('data', json_encode($data));
        $nodeRecord->setNode($node);
        $nodeRecord->store();
    }

    echo json_encode($nodesData, JSON_PRETTY_PRINT);


    sleep(600);


}




