<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fahrrad Controller
 *
 * @property \App\Model\Table\FahrradTable $Fahrrad
 * @method \App\Model\Entity\Fahrrad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FahrradController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $fahrrad = $this->paginate($this->Fahrrad);

        $this->set(compact('fahrrad'));
    }

    /**
     * View method
     *
     * @param string|null $id Fahrrad id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fahrrad = $this->Fahrrad->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('fahrrad'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fahrrad = $this->Fahrrad->newEmptyEntity();
        if ($this->request->is('post')) {
            $fahrrad = $this->Fahrrad->patchEntity($fahrrad, $this->request->getData());
            if ($this->Fahrrad->save($fahrrad)) {
                $this->Flash->success(__('The fahrrad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fahrrad could not be saved. Please, try again.'));
        }
        $this->set(compact('fahrrad'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fahrrad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fahrrad = $this->Fahrrad->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fahrrad = $this->Fahrrad->patchEntity($fahrrad, $this->request->getData());
            if ($this->Fahrrad->save($fahrrad)) {
                $this->Flash->success(__('The fahrrad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fahrrad could not be saved. Please, try again.'));
        }
        $this->set(compact('fahrrad'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fahrrad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fahrrad = $this->Fahrrad->get($id);
        if ($this->Fahrrad->delete($fahrrad)) {
            $this->Flash->success(__('The fahrrad has been deleted.'));
        } else {
            $this->Flash->error(__('The fahrrad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
