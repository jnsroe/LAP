<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Anrede Controller
 *
 * @property \App\Model\Table\AnredeTable $Anrede
 * @method \App\Model\Entity\Anrede[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnredeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $anrede = $this->paginate($this->Anrede);

        $this->set(compact('anrede'));
    }

    /**
     * View method
     *
     * @param string|null $id Anrede id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anrede = $this->Anrede->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('anrede'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anrede = $this->Anrede->newEmptyEntity();
        if ($this->request->is('post')) {
            $anrede = $this->Anrede->patchEntity($anrede, $this->request->getData());
            if ($this->Anrede->save($anrede)) {
                $this->Flash->success(__('The anrede has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anrede could not be saved. Please, try again.'));
        }
        $this->set(compact('anrede'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anrede id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anrede = $this->Anrede->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anrede = $this->Anrede->patchEntity($anrede, $this->request->getData());
            if ($this->Anrede->save($anrede)) {
                $this->Flash->success(__('The anrede has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anrede could not be saved. Please, try again.'));
        }
        $this->set(compact('anrede'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anrede id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anrede = $this->Anrede->get($id);
        if ($this->Anrede->delete($anrede)) {
            $this->Flash->success(__('The anrede has been deleted.'));
        } else {
            $this->Flash->error(__('The anrede could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
