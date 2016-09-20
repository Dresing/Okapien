<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Http\Requests;
use App\Collection;
use App\Topic;
use Illuminate\Support\Facades\Auth;
use App\Team;

class CollectionController extends Controller
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
    public function topicProfile($id, $topicID)
    {
        $collection = Collection::find($id);
        $topic = Topic::find($topicID);

        /**
         * Bad Request
         */
        ($collection === null || $topic === null) ? App::abort(404) :  '';
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

            //Get the team


            
            return view('teacher.collection', [
                'owner' => Auth::user()->userable->teaches($collection, $topic),
                'collection' => $collection,
                'team' => Team::determine(Auth::user()->userable, $collection, $topic),
            ]);

        endif;

        /**
         *  This should never occur unless an error is present. Send them to the login-page.
         */
        return view('auth.login');
    }
}
