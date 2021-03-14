<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Adresse Controller
 *
 * @property \App\Model\Table\AdresseTable $Adresse
 * @method \App\Model\Entity\Adresse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdresseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $adresse = $this->paginate($this->Adresse);

        $this->set(compact('adresse'));
    }

    /**
     * View method
     *
     * @param string|null $id Adresse id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adresse = $this->Adresse->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('adresse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adresse = $this->Adresse->newEmptyEntity();
        if ($this->request->is('post')) {
            $adresse = $this->Adresse->patchEntity($adresse, $this->request->getData());
            if ($this->Adresse->save($adresse)) {
                $this->Flash->success(__('The adresse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adresse could not be saved. Please, try again.'));
        }
        $this->set(compact('adresse'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adresse id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adresse = $this->Adresse->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adresse = $this->Adresse->patchEntity($adresse, $this->request->getData());
            if ($this->Adresse->save($adresse)) {
                $this->Flash->success(__('The adresse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adresse could not be saved. Please, try again.'));
        }
        $this->set(compact('adresse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adresse id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adresse = $this->Adresse->get($id);
        if ($this->Adresse->delete($adresse)) {
            $this->Flash->success(__('The adresse has been deleted.'));
        } else {
            $this->Flash->error(__('The adresse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
