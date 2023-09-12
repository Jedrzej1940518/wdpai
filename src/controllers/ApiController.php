<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ApiController extends AppController {
    public function pros() {
        
        $pros = [];

        if (isset($_COOKIE['user_id'])) {
                
            $id = $_COOKIE['user_id'];
            $user_repository = new UserRepository();
            $pro_ids = $user_repository->getUserPros($id);

            $pro_repository = new ProRepository();

            foreach ($pro_ids as $pro_id)
            {
                $pro = $pro_repository->findProById($pro_id);
                $pros[$pro->getName()] = $pro;
            }
        }
        else
        {
            $pro_repository = new ProRepository();
            $pros = $pro_repository->getDefaultPros();
        }
        $responseData = ['pros' => $pros];

        header('Content-Type: application/json');
        echo json_encode($responseData);
    }
}
