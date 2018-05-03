<?php

namespace App\Http\Controllers;

use App\Repository;
use App\Connection;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;


class RepositoryController extends Controller
{
  protected $orgName="githubtraining";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $repositories=$this->getRepositoriesData();
      $connection=Connection::getLastConecction();
      return view('Repository.index',compact('repositories','connection'));
    }

    /**
     * return an array of App\Repository with data downloaded from de github api
     */
    public function getRepositoriesData(){
      $orgName=$this->orgName;
      if(isset($request->repositoryName)){
        $orgName=$request->repositoryName;
      }
      $conn= new Connection();
      $conn->organization=$orgName;
      $conn->status=0;
      $conn->save();
      $url="https://api.github.com/orgs/$orgName/repos"; // the organization url
      $data=$conn->connect($url);
      $repositories=collect([]);
      $count=0;
      $last=count($data)-10;
      if(is_array($data)){
          foreach($data as $repo){
            $name=$repo->name;
            $comitsUrl="https://api.github.com/repos/$orgName/$name/commits";
            $comits=$conn->connect($comitsUrl);         // Get the commits
            $repository=new Repository();
            $repository->name=$name;
            $ct=Carbon::parse($repo->created_at);
            $repository->creation_date=$ct->toDateTimeString();
            if(is_array($comits)){
              if(isset($comits[0]->commit)){
                $ls=Carbon::parse($comits[0]->commit->committer->date);
                $repository->last_commit=$ls->toDateTimeString();
              }else{
                $repository->last_commit=null;
              }

              $repository->organization=$orgName;
              $repository->description=$repo->description;
              if($count>$last){
                $repository->save();
              }
              $count+=1;
              $repositories->push($repository);
            }
          }
          if($count>0){ // if the connection return any repository change status to 1
            $conn->status=1;
            $conn->save();
          }
        }
        return $repositories;
      }
}
