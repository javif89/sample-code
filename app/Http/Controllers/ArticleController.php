<?php namespace App\Http\Controllers;

use App\Article;
use App\CountryContext;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller {

    const MODEL = Article::class;

    use MediaCRUD;
    use RESTActions {
        RESTActions::create as restCreate;
        RESTActions::update as restUpdate;
        RESTActions::delete as restDelete;

        RESTActions::create insteadof MediaCRUD;
        RESTActions::update insteadof MediaCRUD;
        RESTActions::delete insteadof MediaCRUD;
    }


    public function create(Request $request)
    {
        // Save the file and get the path
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $path = $this->saveFile($file);
            $request->merge(['banner_image_path' => $path]);
        }

        return $this->restCreate($request);
    }

    public function update(Request $request, $id)
    {
        // Update the file and get the path
        if ($request->hasFile('banner_image')) {
            $article = Article::find($id);
            $this->deleteFile($article->banner_image_path);
            $file = $request->file('banner_image');
            $path = $this->saveFile($file);
            $request->merge(['banner_image_path' => $path]);
        }

        if ($request->has('banner_image') && $request->input('banner_image') == 'remove') {
            $request->merge(['banner_image_path' => null]);
        }

        return $this->restUpdate($request, $id);
    }


    public function remove($id)
    {

        $article = Article::find($id);

        if(is_null($article)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $article->delete();
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    public function viewPress(CountryContext $countryContext)
    {
        $pageTitle = 'PRESS';
        $type = Article::TYPE_PRESS;

        $articles = Article::press()->get();

        return view('view.articles')->with(compact('pageTitle', 'articles', 'type'));
    }

    public function edit($id)
    {
        $article = Article::findorFail($id);
        return view('article.edit')->with(compact('article'));
    }
}
