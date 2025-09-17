<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('StudentsModel');
    }

    public function get_all()
    {
        $data['users'] = $this->StudentsModel->all();   
        $this->call->view('view', $data);   
    }

    public function create()
    {
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('First_Name')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'First name may contain letters, spaces, and periods only.')
                ->name('lName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'Last name may contain letters, spaces, and periods only.')
                ->name('email')->required()->max_length(50)->valid_email();

            if ($this->form_validation->run()) {
                $data = [
                    'first_name' => $this->io->post('First_Name'),
                    'last_name'  => $this->io->post('lName'),
                    'email_'     => $this->io->post('email'),
                ];

                if ($this->StudentsModel->insert($data)) {
                    set_flash_alert('success', 'Student added successfully.');
                    return redirect('/get-all');
                } else {
                    set_flash_alert('danger', 'Insert failed. Please try again.');
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }

            return redirect('/students/create');
        }

        $this->call->view('create');
    }

    public function edit($id)
    {
        $user = $this->StudentsModel->filter(['id' => $id])->get();

        if (!$user) {
            set_flash_alert('danger', 'User not found.');
            return redirect('/get-all');
        }

        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('fName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'First name may contain letters, spaces, and periods only.')
                ->name('lName')->required()
                ->custom_pattern('[\p{L}\s\.]+', 'Last name may contain letters, spaces, and periods only.')
                ->name('email')->required()->max_length(50)->valid_email();

            if ($this->form_validation->run()) {
                $data = [
                    'first_name' => $this->io->post('fName'),
                    'last_name'  => $this->io->post('lName'),
                    'email_'     => $this->io->post('email'),
                ];

                if ($this->StudentsModel->filter(['id' => $id])->update($data)) {
                    set_flash_alert('success', 'Student updated successfully.');
                    return redirect('/');
                } else {
                    set_flash_alert('danger', 'Update failed. Please try again.');
                }
            } else {
                set_flash_alert('danger', $this->form_validation->errors());
            }

            return redirect('/students/edit/' . $id);
        }

        return $this->call->view('edit', ['user' => $user]);
    }

   
    public function delete($id)
    {
        if (!$id || !is_numeric($id)) {
            echo 'Invalid ID.';
            return;
        }

        if ($this->StudentsModel->delete($id)) {
            redirect('/get-all');
        } else {
            echo 'Delete failed.';
        }
    }
}
