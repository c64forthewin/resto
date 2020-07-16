<?php


namespace App\Factories;


use App\Daos\UsersDao;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserFactory
{
    /** @var UsersDao $usersDao */
    private $usersDao;


    public function __construct(UsersDao $usersDao)
    {
        $this->usersDao = $usersDao;
    }

    public function from_id(int $id): User
    {
        $dao_user = $this->usersDao->get_user_by_id($id);
        return $this->user_from_dao($dao_user);
    }

    public function from_auth(string $email, string $password): ?User
    {
        try{
            $dao_user = $this->usersDao->get_user_by_email($email);
        }catch (\Throwable $exception){
            //Email existiert nicht
            return null;
        }
        if (!$this->usersDao->validate_auth($email, $password)) {
            return null;
        }

        return $this->user_from_dao($dao_user);
    }

    public function add_user(string $name, string $email, string $pasword): User
    {
        $user = new User($name, $email);
        return $this->from_id($this->usersDao->insert_user($user, $pasword));
    }

    private function user_from_dao(UsersDao $dao_user): User
    {
        $name = $dao_user->getAttribute('name');
        $email = $dao_user->getAttribute('email');

        return new User($name, $email);
    }
}
