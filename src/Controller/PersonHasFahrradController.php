<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PersonHasFahrrad Controller
 *
 * @property \App\Model\Table\PersonHasFahrradTable $PersonHasFahrrad
 * @method \App\Model\Entity\PersonHasFahrrad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonHasFahrradController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
            $this->paginate = [
                'contain' => ['Person', 'Fahrrad', 'Zahlungsmoeglichkeiten']
            ];


        $personHasFahrrad = $this->paginate($this->PersonHasFahrrad);

        $this->set(compact('personHasFahrrad'));
    }

    /**
     * View method
     *
     * @param string|null $id Person Has Fahrrad id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personHasFahrrad = $this->PersonHasFahrrad->get($id, [
            'contain' => ['Person', 'Fahrrad', 'Zahlungsmoeglichkeiten'],
        ]);

        $this->set(compact('personHasFahrrad'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personHasFahrrad = $this->PersonHasFahrrad->newEmptyEntity();
        if ($this->request->is('post')) {
            $personHasFahrrad = $this->PersonHasFahrrad->patchEntity($personHasFahrrad, $this->request->getData());
            if ($this->PersonHasFahrrad->save($personHasFahrrad)) {
                $this->Flash->success(__('The person has fahrrad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person has fahrrad could not be saved. Please, try again.'));
        }
        $person = $this->PersonHasFahrrad->Person->find('list', ['limit' => 200]);
        $fahrrad = $this->PersonHasFahrrad->Fahrrad->find('list', ['limit' => 200]);
        $zahlungsmoeglichkeiten = $this->PersonHasFahrrad->Zahlungsmoeglichkeiten->find('list', ['limit' => 200]);
        $this->set(compact('personHasFahrrad', 'person', 'fahrrad', 'zahlungsmoeglichkeiten'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person Has Fahrrad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personHasFahrrad = $this->PersonHasFahrrad->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personHasFahrrad = $this->PersonHasFahrrad->patchEntity($personHasFahrrad, $this->request->getData());
            if ($this->PersonHasFahrrad->save($personHasFahrrad)) {
                $this->Flash->success(__('The person has fahrrad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person has fahrrad could not be saved. Please, try again.'));
        }
        $person = $this->PersonHasFahrrad->Person->find('list', ['limit' => 200]);
        $fahrrad = $this->PersonHasFahrrad->Fahrrad->find('list', ['limit' => 200]);
        $zahlungsmoeglichkeiten = $this->PersonHasFahrrad->Zahlungsmoeglichkeiten->find('list', ['limit' => 200]);
        $this->set(compact('personHasFahrrad', 'person', 'fahrrad', 'zahlungsmoeglichkeiten'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person Has Fahrrad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personHasFahrrad = $this->PersonHasFahrrad->get($id);
        if ($this->PersonHasFahrrad->delete($personHasFahrrad)) {
            $this->Flash->success(__('The person has fahrrad has been deleted.'));
        } else {
            $this->Flash->error(__('The person has fahrrad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function search()
    {
        $conditions = [];
        $results = null;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if(!empty($data['search_string'])){
                $conditions['body LIKE']= '%'.$data['search_string'].'%';
            }

            if(!empty($data['type_id'])){
                $conditions['type_id'] = $data['type_id'];
            }
            $results = $this->Articles->find('all', ['conditions' => $conditions]);
        }
        $articles = $this->Articles->Types->find('list', ['limit' => 200]);
        $this->set(compact('articles','conditions','results'));
    }
}
