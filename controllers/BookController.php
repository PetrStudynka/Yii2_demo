<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\BookSearch;
use app\models\GenreBookLink;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Genre;
use Exception;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionUpdate($id)
    {
        $book = $this->findModel($id);
        $genreBook = new GenreBookLink();

        $genre = Genre::findOne(Yii::$app->request->post('GenreBookLink')['genre']);

        if ($genre && $book->validate()) {
            $genreBook->book = $book->id_book;
            $genreBook->genre = $genre->id_genre;
            $genreBook->insert(false);
            return $this->redirect(['index']);
        }

        return $this->render('view', [
            'book' => $book,
            'genreBook' => $genreBook,
        ]);
    }


    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $book = new Book();
        $genreBook = new GenreBookLink();

        if ($book->load(Yii::$app->request->post()) && $genreBook->load(Yii::$app->request->post())) {

            $genre = Genre::findOne(Yii::$app->request->post('GenreBookLink')['genre']);

            if (!$genre) {
                throw new NotFoundHttpException('Nepodařilo se najít zadaný žánr.');
            }

            if ($book->validate()) {
                $book->insert(false);
                $genreBook->book = $book->id_book; //TODO transaction
                $genreBook->insert(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'book' => $book,
            'genreBook' => $genreBook
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Požadovaná stránka neexistuje.');
    }
}
