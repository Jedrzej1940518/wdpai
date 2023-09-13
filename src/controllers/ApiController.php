<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/ProRepository.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/AppMatchRepository.php';


class ApiController extends AppController
{
    public function pros()
    {

        $pros = [];

        if (isset($_COOKIE['user_id'])) {

            $id = $_COOKIE['user_id'];
            $user_repository = new UserRepository();
            $pro_ids = $user_repository->getUserPros($id);

            $pro_repository = new ProRepository();

            foreach ($pro_ids as $pro_id) {
                $pro = $pro_repository->findProById($pro_id);
                $pros[$pro->getName()] = $pro;
            }
        } else {
            $pro_repository = new ProRepository();
            $pros = $pro_repository->getDefaultPros();
        }
        $responseData = ['pros' => $pros];

        header('Content-Type: application/json');
        echo json_encode($responseData);
    }
    public function matches($pro_id)
    {
        $app_match_repository = new AppMatchRepository();
        $pro_repository = new ProRepository();
        $accounts = $pro_repository->getProAccounts($pro_id);
        $matches = [];
        foreach($accounts as $account)
        {
            $account_id = $account->getId();
            $matches[$account_id] = $app_match_repository->getAppMatchesByAccount($account_id);
        }
        $responseData = ['matches' => $matches];

        header('Content-Type: application/json');
        echo json_encode($responseData);
    }
}