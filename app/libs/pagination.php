<?php

class Pagination {

    public function pagesNumber($totalPages,$postsInPage):int{

        return ceil($totalPages / $postsInPage);

    }

    public function limit(int $page,int $postsInPage):string{

        $start = ($page - 1) * $postsInPage;
        return "LIMIT " . $start . " , " . $postsInPage;

    }


    public function nextPage($num,$pages){

        if($num < $pages){
            return $num + 1;
        }else{
            return $num;
        }

    }


    public function previousPage($num){

        if($num > 1){
            return $num - 1;
        }else{
            return $num;
        }

    }

}