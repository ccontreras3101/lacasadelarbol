<?php

namespace app\controllers;

use Yii;
use app\models\TbClientes;
use app\models\TbComandas;
use app\models\TbClientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientesController implements the CRUD actions for TbCLientes model.
 */
class ClientesController extends Controller
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
     * Lists all TbCLientes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbClientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbCLientes model.
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
     * Creates a new TbCLientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbCLientes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbCLientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $comanda = TbComandas::find()->where(['id_cliente' => $_POST['cedula_comanda'] ])->All();
            foreach ($comanda as $key => $value) {
                $value->id_cliente = $_POST['TbClientes']['cedula'];
                $value->save(false);
            }

            $model->nombres = $_POST['TbClientes']['nombres'];
            $model->apellidos = $_POST['TbClientes']['apellidos'];
            $model->cedula = $_POST['TbClientes']['cedula'];
            $model->direccion = $_POST['TbClientes']['direccion'];
            $model->telf1 = $_POST['TbClientes']['telf1'];
            $model->facebook = $_POST['TbClientes']['facebook'];
            $model->twitter = $_POST['TbClientes']['twitter'];
            $model->instagram = $_POST['TbClientes']['instagram'];
            $model->email = $_POST['TbClientes']['email'];
            $model->save(false);

            Yii::$app->session->setFlash('success', "Los Datos del cliente: ".$model->nombres.", ".$model->apellidos." han sido modificados exitosamente");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbCLientes model.
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
     * Finds the TbCLientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbCLientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbCLientes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionNotifications()
    {   
        $model = TbCLientes::find()->All();
        $comandas = TbComandas::find()->All();
        return $this->render('notifications', [            
            'model'=> $model,
            'comandas'=> $comandas,
        ]);
    }
}
