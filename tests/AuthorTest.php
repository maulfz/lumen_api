<?php

class AuthorTest extends TestCase
{
    /**
     * /api/authors [GET]
     */
    public function testShouldReturnAllAuthors(){

        $this->get("api/authors", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' =>
                [
                    '_id',
                    'name',
                    'email',
                    'twitter',
                    'github',
                    'latest_article_published',
                    'updated_at',
                    'created_at',
                ]
            /*'data' => ['*' =>
                [
                    '_id',
                    'name',
                    'email',
                    'twitter',
                    'github',
                    'latest_article_published',
                    'updated_at',
                    'created_at',
                ]
            ]*/
        ]);
        
    }

    /**
     * /api/authors/{id} [GET]
     */
    public function testShouldReturnAuthor(){
        $this->get("api/authors/600504f18f673224c40031e2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'name',
                'email',
                'twitter',
                'github',
                'latest_article_published',
                'updated_at',
                'created_at',
            ]
        );
        
    }

    /**
     * /api/authors [POST]
     */
    public function testShouldCreateAuthor(){

        $parameters = [
            "name" => "Test Third",
            "email" => "third@denmaul.com",
            "twitter" => "third",
            "github" => "third",
            "latest_article_published" => "30 Days Of Night3"
        ];

        $this->post("/api/authors", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'name',
                'email',
                'twitter',
                'github',
                'latest_article_published',
                'updated_at',
                'created_at'
            ]   
        );
        
    }
    
    /**
     * /api/authors/{id} [PUT]
     */
    public function testShouldUpdateAuthor(){

        $parameters = [
            "name" => "Test Third v3",
            "email" => "third3@denmaul.com",
            "twitter" => "third3",
            "github" => "third3",
            "latest_article_published" => "30 Days Night3v3"            
        ];

        $this->put("api/authors/60051b2b8f6732145c003e02", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'name',
                'email',
                'twitter',
                'github',
                'latest_article_published',
                'updated_at',
                'created_at'
            ]  
        );
    }

    /**
     * /api/authors/{id} [DELETE]
     */
    public function testShouldDeleteAuthor(){
        $this->delete("api/authors/60051b2b8f6732145c003e02", [], []);
        //$this->seeStatusCode(410);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}