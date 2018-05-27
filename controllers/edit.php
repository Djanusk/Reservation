<?php
    function testimonials_edit($id)
    {
            $this->load->helper('form');  
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->model('testimonials_model');
            $this->data=$this->testimonials_model->general();
            $testimonials = $this->testimonials_model->get_testimonials($id);

        $this->data['title'] = 'Edit Testimonial';

        //validate form input
        $this->form_validation->set_rules('title', 'Author', 'required|xss_clean');
        $this->form_validation->set_rules('contentbox', 'content', 'required|xss_clean');
        if (isset($_POST) && !empty($_POST))
        {       

            if ($this->form_validation->run() === true)
            {
                $data = array(
                'title'=>$this->input->post('title'),
                'content'=> $this->input->post('contentbox'),
            );

                $this->testimonials_model->updatetestimonials($id, $data);
                $this->session->set_flashdata('message', "<p>Testimonial is updated successfully.</p>");

                redirect('testimonials_controller/testimonials_edit/'.$id);
            }           
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

        $this->data['testimonials'] = $testimonials;

        //display the edit product form


        $this->data['title'] = array(
            'name'      => 'title',
            'id'        => 'title',
            'type'      => 'text',
            'style'     => 'width:300px;',
            'value'     => $this->form_validation->set_value('title', $testimonials['title']),
        );

        $this->data['content'] = array(
                'name'      => 'contentbox',
                'id'        => 'contentbox',
                'type'      => 'text',
                'cols'      =>  60,
                'rows'      =>  5,
                'style'     => 'width:250px;',
                'value'     => $this->form_validation->set_value('contentbox',$testimonials['content']),
        );

        $this->load->view('testimonials_edit', $this->data);
    }
?>