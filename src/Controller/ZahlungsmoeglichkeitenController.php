<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Zahlungsmoeglichkeiten Controller
 *
 * @property \App\Model\Table\ZahlungsmoeglichkeitenTable $Zahlungsmoeglichkeiten
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ZahlungsmoeglichkeitenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $zahlungsmoeglichkeiten = $this->paginate($this->Zahlungsmoeglichkeiten);

        $this->set(compact('zahlungsmoeglichkeiten'));
    }

    /**
     * View method
     *
     * @param string|null $id Zahlungsmoeglichkeiten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('zahlungsmoeglichkeiten'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->newEmptyEntity();
        if ($this->request->is('post')) {
            $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->patchEntity($zahlungsmoeglichkeiten, $this->request->getData());
            if ($this->Zahlungsmoeglichkeiten->save($zahlungsmoeglichkeiten)) {
                $this->Flash->success(__('The zahlungsmoeglichkeiten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zahlungsmoeglichkeiten could not be saved. Please, try again.'));
        }
        $this->set(compact('zahlungsmoeglichkeiten'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Zahlungsmoeglichkeiten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->patchEntity($zahlungsmoeglichkeiten, $this->request->getData());
            if ($this->Zahlungsmoeglichkeiten->save($zahlungsmoeglichkeiten)) {
                $this->Flash->success(__('The zahlungsmoeglichkeiten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zahlungsmoeglichkeiten could not be saved. Please, try again.'));
        }
        $this->set(compact('zahlungsmoeglichkeiten'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Zahlungsmoeglichkeiten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zahlungsmoeglichkeiten = $this->Zahlungsmoeglichkeiten->get($id);
        if ($this->Zahlungsmoeglichkeiten->delete($zahlungsmoeglichkeiten)) {
            $this->Flash->success(__('The zahlungsmoeglichkeiten has been deleted.'));
        } else {
            $this->Flash->error(__('The zahlungsmoeglichkeiten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
