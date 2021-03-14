<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Titel Controller
 *
 * @property \App\Model\Table\TitelTable $Titel
 * @method \App\Model\Entity\Titel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TitelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $titel = $this->paginate($this->Titel);

        $this->set(compact('titel'));
    }

    /**
     * View method
     *
     * @param string|null $id Titel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $titel = $this->Titel->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('titel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $titel = $this->Titel->newEmptyEntity();
        if ($this->request->is('post')) {
            $titel = $this->Titel->patchEntity($titel, $this->request->getData());
            if ($this->Titel->save($titel)) {
                $this->Flash->success(__('The titel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titel could not be saved. Please, try again.'));
        }
        $this->set(compact('titel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Titel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $titel = $this->Titel->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $titel = $this->Titel->patchEntity($titel, $this->request->getData());
            if ($this->Titel->save($titel)) {
                $this->Flash->success(__('The titel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titel could not be saved. Please, try again.'));
        }
        $this->set(compact('titel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Titel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $titel = $this->Titel->get($id);
        if ($this->Titel->delete($titel)) {
            $this->Flash->success(__('The titel has been deleted.'));
        } else {
            $this->Flash->error(__('The titel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
