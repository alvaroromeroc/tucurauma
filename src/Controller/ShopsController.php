<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shops Controller
 *
 * @property \App\Model\Table\ShopsTable $Shops
 *
 * @method \App\Model\Entity\Shop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShopsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $shops = $this->paginate($this->Shops);

        $this->set(compact('shops'));
    }

    /**
     * View method
     *
     * @param string|null $id Shop id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shop = $this->Shops->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('shop', $shop);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shop = $this->Shops->newEntity();
        if ($this->request->is('post')) {
            $shop = $this->Shops->patchEntity($shop, $this->request->getData());
            if ($this->Shops->save($shop)) {
                $this->Flash->success(__('La tienda fue grabada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La tienda no puede ser grabada. Reintente por favor.'));
        }
        $categories = $this->Shops->Categories->find('list', ['limit' => 200]);
        $this->set(compact('shop', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shop = $this->Shops->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shop = $this->Shops->patchEntity($shop, $this->request->getData());
            if ($this->Shops->save($shop)) {
                $this->Flash->success(__('La tienda fue grabada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La tienda no puede ser grabada. Reintente por favor.'));
        }
        $categories = $this->Shops->Categories->find('list', ['limit' => 200]);
        $this->set(compact('shop', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shop = $this->Shops->get($id);
        if ($this->Shops->delete($shop)) {
            $this->Flash->success(__('La tienda fue borrada.'));
        } else {
            $this->Flash->error(__('La tienda no puede ser borrada. Reintente por favor.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
