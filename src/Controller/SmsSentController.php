<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SmsSent Controller
 *
 * @property \App\Model\Table\SmsSentTable $SmsSent
 */
class SmsSentController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('smsSent', $this->paginate($this->SmsSent));
        $this->set('_serialize', ['smsSent']);
    }

    /**
     * View method
     *
     * @param string|null $id Sms Sent id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smsSent = $this->SmsSent->get($id, [
            'contain' => []
        ]);
        $this->set('smsSent', $smsSent);
        $this->set('_serialize', ['smsSent']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smsSent = $this->SmsSent->newEntity();
        if ($this->request->is('post')) {
            $smsSent = $this->SmsSent->patchEntity($smsSent, $this->request->data);
            if ($this->SmsSent->save($smsSent)) {
                $this->Flash->success(__('The sms sent has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sms sent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('smsSent'));
        $this->set('_serialize', ['smsSent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sms Sent id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smsSent = $this->SmsSent->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsSent = $this->SmsSent->patchEntity($smsSent, $this->request->data);
            if ($this->SmsSent->save($smsSent)) {
                $this->Flash->success(__('The sms sent has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sms sent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('smsSent'));
        $this->set('_serialize', ['smsSent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sms Sent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smsSent = $this->SmsSent->get($id);
        if ($this->SmsSent->delete($smsSent)) {
            $this->Flash->success(__('The sms sent has been deleted.'));
        } else {
            $this->Flash->error(__('The sms sent could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
