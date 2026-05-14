<?php
require_once __DIR__ . '/../dao/UserDAO.php';
require_once __DIR__ . '/../dao/EmailVerificationDAO.php';

class UserController
{
  private function view($name, $data = [])
  {
    extract($data, EXTR_SKIP);

    require __DIR__ . '/../../public/views/' . $name . '.php';
  }

  public function profile($userId) {
    $user = (new UserDAO())->findById($userId);

    var_dump($user);
    
    $this->view("user/profile", ['user' => $user]);
  }

  public function update($userId) {
    var_dump($_POST);
    // 1. Apanhar o username e email
  $username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');

if($username == '' || $email == '') {
  throw new Exception("Username e email são obrigatórios");
}

    // 2.
    $result = (new UserDAO())->updateUser($userId, $username, $email);

    if(! $result) {
      throw new Exception("Erro ao atualizar utilizador");
    }
    // 3. Attualizar os dados que estão na seession
    // A session vai ser atualizada apenas
    // Se $userId == $_SESSION['token']['id']
    if (AuthMiddlewareWeb::canEdit($userId)) {
      $_SESSION['token']['username'] = $username;
      $_SESSION['token']['email'] = $email;
    }

    return;  
  }

  public function getUsers() {
    $users = (new UserDAO())->getUsersDAO();
  }
}