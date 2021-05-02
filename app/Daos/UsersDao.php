<?php


namespace App\Daos;


use App\Value\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UsersDao extends Model
{
    protected $connection = "mysql";

    const PROPERTY_ID = 'id';
    const PROPERTY_EMAIL = 'email';
    const PROPERTY_NAME = 'name';
    const PROPERTY_PASSWORD = 'password';

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected static $unguarded = true;

    public function get_user_by_id(string $id): Model
    {
        return UsersDao::query()->find($id);
    }

    public function get_user_by_email(string $email): UsersDao
    {
        $collection = UsersDao::query()
            ->select('*')
            ->where(self::PROPERTY_EMAIL, '=', $email);
        return  $collection->get()->first();
    }

    public function validate_auth(string $email, string $password): bool
    {
        $dao_password = UsersDao::query()
            ->select('password')
            ->where(self::PROPERTY_EMAIL, '=', $email)
            ->first()
            ->getAttribute('password');
        return ($dao_password === $password);

    }

    /**
     * @throws \Safe\Exceptions\PasswordException
     */
    public function insert_user(User $user, string $password): int
    {
        return UsersDao::query()->insertGetId([
            self::PROPERTY_NAME => $user->name(),
            self::PROPERTY_EMAIL => $user->email(),
            self::PROPERTY_PASSWORD => \Safe\password_hash($password, 1)
        ]);
    }
}
