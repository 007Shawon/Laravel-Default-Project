<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No posts found!');
    }
    public function testSee1BlogPostWhenThereIs1WithNoComments()
    {
        //Arrange
        $post = $this->createDummyBlogPost();

        //Act
        $response = $this->get('/posts');

        //Assert
        $response->assertSeeText('New Title');
        $this->assertDatabaseHas('blog_posts',[
           'title' => 'New Title'
        ]);
    }

    public function testSee1BlogPostWithComments()
    {
        //Arrange
        $post = $this->createDummyBlogPost();
        factory(App\Models\Comment::class, 4)->create([
            'blog_post_id' => $post->id
        ]);
        //Act
        $response = $this->get('/posts');
        $response->assertSeeText('4 comments');
    }
    public function testStoreValid()
    {
        $user = $this->user();
        $params = [
          'title' => 'Valid title',
          'content' => 'At least 10 characters'
        ];

        $this->actingAs($this->user())
             ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post was created!');
    }
    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->actingAs($this->user())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

         $messages = session('errors')->getMessages();
        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
    }
    public function testUpdateValid()
    {
        $post = $this->createDummyBlogPost();
        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed'
        ];

        $this->actingAs($this->user())
            ->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');
        $this->assertEquals(session('status'), 'Blog post was updated!');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
        $this->assertDatabaseHas('blog_posts',[
            'title'=> 'A new named title'
        ]);
    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();
//        $this->assertDatabaseHas('blog_posts',$post->toArray());

        $this->actingAs($this->user())
            ->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');
        $this->assertEquals(session('status'), 'Blog post was deleted!');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
    }
    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = 'Content of the blog post';
        $post->save();

        $post = BlogPost::factory()->newTitleState()->create();

        return $post;
    }
}
