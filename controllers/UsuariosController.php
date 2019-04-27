<?php

namespace app\controllers;

use Yii;
use app\models\TbUsuarios;
use app\models\TbUsuariosSearch;
use app\models\TbRol;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UsuariosController implements the CRUD actions for TbUsuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all TbUsuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbUsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbUsuarios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TbUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbUsuarios();

        if ($model->load(Yii::$app->request->post())) {
                $model->id_rol = $_POST['TbUsuarios']['id_rol'];
                $model->username = $_POST['TbUsuarios']['username'];
                $model->password = sha1($_POST['TbUsuarios']['password']);
                $model->nombres = $_POST['TbUsuarios']['nombres'];
                $model->apellidos = $_POST['TbUsuarios']['apellidos'];
                $model->cedula = $_POST['TbUsuarios']['cedula'];
                $model->direccion = $_POST['TbUsuarios']['direccion'];
                $model->telf1 = $_POST['TbUsuarios']['telf1'];
                $model->telf2 = $_POST['TbUsuarios']['telf2'];
                $model->email = $_POST['TbUsuarios']['email'];
                $model->facebook = $_POST['TbUsuarios']['facebook'];
                $model->twitter = $_POST['TbUsuarios']['twitter'];
                $model->instagram = $_POST['TbUsuarios']['instagram'];
                $model->f_ingreso = $_POST['TbUsuarios']['f_ingreso'];
                $model->f_egreso = $_POST['TbUsuarios']['f_egreso'];
                $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_rol = $_POST['TbUsuarios']['id_rol'];
                $model->username = $_POST['TbUsuarios']['username'];
                $model->password = sha1($_POST['TbUsuarios']['password']);
                $model->nombres = $_POST['TbUsuarios']['nombres'];
                $model->apellidos = $_POST['TbUsuarios']['apellidos'];
                $model->cedula = $_POST['TbUsuarios']['cedula'];
                $model->direccion = $_POST['TbUsuarios']['direccion'];
                $model->telf1 = $_POST['TbUsuarios']['telf1'];
                $model->telf2 = $_POST['TbUsuarios']['telf2'];
                $model->email = $_POST['TbUsuarios']['email'];
                $model->facebook = $_POST['TbUsuarios']['facebook'];
                $model->twitter = $_POST['TbUsuarios']['twitter'];
                $model->instagram = $_POST['TbUsuarios']['instagram'];
                $model->f_ingreso = $_POST['TbUsuarios']['f_ingreso'];
                $model->f_egreso = $_POST['TbUsuarios']['f_egreso'];
                $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbUsuarios model.
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
     * Finds the TbUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbUsuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
