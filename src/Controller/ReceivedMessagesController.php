<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReceivedMessages Controller
 *
 * @property \App\Model\Table\ReceivedMessagesTable $ReceivedMessages
 */
class ReceivedMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('receivedMessages', $this->paginate($this->ReceivedMessages));
        $this->set('_serialize', ['receivedMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Received Message id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receivedMessage = $this->ReceivedMessages->get($id, [
            'contain' => []
        ]);
        $this->set('receivedMessage', $receivedMessage);
        $this->set('_serialize', ['receivedMessage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receivedMessage = $this->ReceivedMessages->newEntity();
        if ($this->request->is('post')) {
            $receivedMessage = $this->ReceivedMessages->patchEntity($receivedMessage, $this->request->data);
            if ($this->ReceivedMessages->save($receivedMessage)) {
                $this->Flash->success(__('The received message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The received message could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('receivedMessage'));
        $this->set('_serialize', ['receivedMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Received Message id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receivedMessage = $this->ReceivedMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receivedMessage = $this->ReceivedMessages->patchEntity($receivedMessage, $this->request->data);
            if ($this->ReceivedMessages->save($receivedMessage)) {
                $this->Flash->success(__('The received message has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The received message could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('receivedMessage'));
        $this->set('_serialize', ['receivedMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Received Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receivedMessage = $this->ReceivedMessages->get($id);
        if ($this->ReceivedMessages->delete($receivedMessage)) {
            $this->Flash->success(__('The received message has been deleted.'));
        } else {
            $this->Flash->error(__('The received message could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
