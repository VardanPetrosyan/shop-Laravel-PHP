<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provaider_user_id','provaider','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }

    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }
    public function hasRole($check)
    {
        foreach($this->roles->toArray() as $key => $value){
            if(in_array($check, $value)){
               return true;
            }
        };
        return false;
    }
    private function getIdInArray($array, $term)
    {
        foreach($array as $key => $value){
            if($value == $term){
                return $key + 1;
            }    
        }
        throw new UnexpectedValueException;
    }

    public function MakeEmployee($title,$checked)
    {  

        if($checked == 'false'){
            foreach ($this->roles as $userRole) {
                if($userRole->name == $title->name){
                    $this->roles()->detach($userRole->id);
                }
            }
        }
         if($checked == 'true'){
            $roles = Arr::pluck(Role::all()->toArray(),'name');
            $assigned_roles = array();
            if(is_object($title)){
                $name= $title->name;
            }else{
                $name = $title;
            }
            switch ($name){
                case 'admin':
                    $assigned_roles[] = $this->getIdInArray($roles, 'admin');
                break;
                case 'manager':
                    $assigned_roles[] = $this->getIdInArray($roles, 'manager');
                break;
                case 'client':
                    $assigned_roles[] = $this->getIdInArray($roles, 'client');
                break;    
                default:
                    $assigned_roles[] = false;
            }
            $this->roles()->attach($assigned_roles);
            
        };
        
    }
}
