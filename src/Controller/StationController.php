<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Station Controller
 *
 * @property \App\Model\Table\StationTable $Station
 * @method \App\Model\Entity\Station[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adresse'],
        ];
        $station = $this->paginate($this->Station);

        $this->set(compact('station'));
    }

    /**
     * View method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $station = $this->Station->get($id, [
            'contain' => ['Adresse'],
        ]);

        $this->set(compact('station'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $station = $this->Station->newEmptyEntity();
        if ($this->request->is('post')) {
            $station = $this->Station->patchEntity($station, $this->request->getData());
            if ($this->Station->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $adresse = $this->Station->Adresse->find('list', ['limit' => 200]);
        $this->set(compact('station', 'adresse'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $station = $this->Station->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $station = $this->Station->patchEntity($station, $this->request->getData());
            if ($this->Station->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $adresse = $this->Station->Adresse->find('list', ['limit' => 200]);
        $this->set(compact('station', 'adresse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $station = $this->Station->get($id);
        if ($this->Station->delete($station)) {
            $this->Flash->success(__('The station has been deleted.'));
        } else {
            $this->Flash->error(__('The station could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
