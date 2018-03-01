<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 3/1/18
 * Time: 10:09 PM
 */
namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters {
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by', 'popular', 'unanswered'];
    /**
     * Filter the query by a given username.
     *
     * @param  string $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
}