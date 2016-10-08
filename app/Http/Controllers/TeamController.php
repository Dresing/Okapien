<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Http\Requests;
use App\Collection;
use App\Topic;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\User;

class TeamController extends Controller
{
    /**
     * Generates a collection profile which is not topic-specific.
     *
     * @param $id ID of the collection
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function collectionProfile($id)
    {
        $collection = Collection::find($id);

        /**
         * Bad Request
         */
        ($collection === null) ? App::abort(404) :  '';

        /**
         * If student is requesting
         */
        if (Auth::user()->is('Student')):
            return view('student.home', [
                'teachers' => User::all(), //Get all teachers
            ]);

        /**
         * If teacher is requesting
         */
        elseif (Auth::user()->is('Teacher')):

            
            return view('teacher.collection', [
                'owner' => Auth::user()->userable->teaches($collection),
                'collection' => $collection
            ]);

        endif;

        /**
         *  This should never occur unless an error is present. Send them to the login-page.
         */
        return view('auth.login');
    }


    /**
     * Generates a collection profile based on a topic.
     *
     * @param $id ID of the collection
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teamProfile(Team $team)
    {

        /**
         * If student is requesting
         */
        if (Auth::user()->is('Student')):
            //Get the team
            return view('student.team', [
                'team' => $team,
            ]);

        /**
         * If teacher is requesting
         */
        elseif (Auth::user()->is('Teacher')):

            //Get the team
            return view('teacher.team', [
                'team' => $team
            ]);

        endif;

        /**
         *  This should never occur unless an error is present. Send them to the login-page.
         */
        return view('auth.login');
    }
}
