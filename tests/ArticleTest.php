<?php

class ArticleTest extends TestCase
{
    /**
     * /api/articles [GET]
     */
    public function testShouldReturnAllArticles(){

        $this->get("api/articles", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' =>
                [
                    '_id',
                    'title',
                    'content',
                    'description',
                    'authors_id',
                    'years',
                    'created_at',
                    'updated_at'
                ]
        ]);
        
    }

    /**
     * /api/articles/{id} [GET]
     */
    public function testShouldReturnArticle(){
        $this->get("api/articles/60051c0f8f673203ec0016d2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'title',
                'content',
                'description',
                'authors_id',
                'years',
                'created_at',
                'updated_at'
            ]
        );
        
    }

    /**
     * /api/articles [POST]
     */
    public function testShouldCreatearticle(){

        $parameters = [
            "title" => 'Article 3',
            "content" => 'This body content of Article 3',
            "description" => "release-3",
            "authors_id" => '600243f48f67320d14001c83',
            "years" => '2021',
        ];

        $this->post("/api/articles", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'title',
                'content',
                'description',
                'authors_id',
                'years',
                'created_at',
                'updated_at'
            ]  
        );
        
    }
    
    /**
     * /api/articles/{id} [PUT]
     */
    public function testShouldUpdateArticle(){

        $parameters = [
            "title" => 'Article 33',
            "content" => 'This body content of Article 33',
            "description" => "release-33",
            "authors_id" => '600243f48f67320d14001c83',
            "years" => '2021',
        ];

        $this->put("api/articles/60051c0f8f673203ec0016d2", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'title',
                'content',
                'description',
                'authors_id',
                'years',
                'created_at',
                'updated_at'
            ] 
        );
    }

    /**
     * /api/articles/{id} [DELETE]
     */
    public function testShouldDeleteArticle(){
        $this->delete("api/articles/60051c0f8f673203ec0016d2", [], []);
        //$this->seeStatusCode(410);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}