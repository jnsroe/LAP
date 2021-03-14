<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Person Controller
 *
 * @property \App\Model\Table\PersonTable $Person
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if ($this->request->is('post'))
        {
            $data = $this->request->getData();

            $searchString = $data['search_string'];

            $conditions['Person.Name like'] = '%'.$searchString.'%';

            $this->paginate = [
                'contain' => ['Adresse', 'Titel', 'Anrede'],
                'conditions' => ['or' => $conditions],
            ];
        }else{

            $this->paginate = [
                'contain' => ['Adresse', 'Titel', 'Anrede'],
                ];
        }



        $person = $this->paginate($this->Person);

        $this->set(compact('person'));
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->Person->get($id, [
            'contain' => ['Adresse', 'Titel', 'Anrede'],
        ]);

        $this->set(compact('person'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Person->newEmptyEntity();
        if ($this->request->is('post')) {
            $person = $this->Person->patchEntity($person, $this->request->getData());
            if ($this->Person->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $adresse = $this->Person->Adresse->find('list', ['limit' => 200]);
        $titel = $this->Person->Titel->find('list', ['limit' => 200]);
        $anrede = $this->Person->Anrede->find('list', ['limit' => 200]);
        $this->set(compact('person', 'adresse', 'titel', 'anrede'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Person->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Person->patchEntity($person, $this->request->getData());
            if ($this->Person->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $adresse = $this->Person->Adresse->find('list', ['limit' => 200]);
        $titel = $this->Person->Titel->find('list', ['limit' => 200]);
        $anrede = $this->Person->Anrede->find('list', ['limit' => 200]);
        $this->set(compact('person', 'adresse', 'titel', 'anrede'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Person->get($id);
        if ($this->Person->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
