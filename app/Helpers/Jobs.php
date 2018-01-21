<?php

  function getJobStatus($type = 'pending')
  {

  		$status = ($type == "pending") ? DB::table('jobs')->count() :  DB::table('failed_jobs')->count();

      return $status;
  }
