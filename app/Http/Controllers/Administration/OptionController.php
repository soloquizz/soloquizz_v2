<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateOptionRequest;
use App\Http\Requests\Administration\UpdateOptionRequest;
use App\Repositories\Administration\OptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class OptionController extends AppBaseController
{
    /** @var OptionRepository $optionRepository*/
    private $optionRepository;

    public function __construct(OptionRepository $optionRepo)
    {
        $this->optionRepository = $optionRepo;
    }

    /**
     * Display a listing of the Option.
     *
     * @param Request $request
     *
     * @return
     */
    public function index(Request $request)
    {
        $options = $this->optionRepository->all();

        return view('administration.options.index')
            ->with('options', $options);
    }

    /**
     * Show the form for creating a new Option.
     *
     * @return
     */
    public function create()
    {
        //return view('administration.options.create');
    }

    /**
     * Store a newly created Option in storage.
     *
     * @param CreateOptionRequest $request
     *
     * @return
     */
    public function store(CreateOptionRequest $request)
    {
        $input = $request->all();

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $option = $this->optionRepository->create($input);

        Alert::success('Succés','Option saved successfully.');

        $page = '';
        if (isset($input['page'])){
            $page = $input['page'];
        }


        return redirect(route('admin.certifications.questions.display', ['page' => $page,'search' => '','certification_id'=>$input['certification_id']]));

    }

    /**
     * Display the specified Option.
     *
     * @param int $id
     *
     * @return
     */
    public function show($id)
    {
        /*$option = $this->optionRepository->find($id);

        if (empty($option)) {
            Alert::error('Option not found');

            return redirect(route('admin.options.index'));
        }

        return view('administration.options.show')->with('option', $option);*/
    }

    /**
     * Show the form for editing the specified Option.
     *
     * @param int $id
     *
     * @return
     */
    public function edit($id)
    {
        /*$option = $this->optionRepository->find($id);

        if (empty($option)) {
            Alert::error('Error','Option not found');

            return redirect(route('admin.options.index'));
        }

        $question = $option->question;
        $certification = $option->question->certification;

        return view('template.administration.options.edit',compact('certification','option','question'));*/
    }

    /**
     * Update the specified Option in storage.
     *
     * @param int $id
     * @param UpdateOptionRequest $request
     *
     * @return
     */
    public function update($id, UpdateOptionRequest $request)
    {
        $option = $this->optionRepository->find($id);

        $input = $request->all();

        if (empty($option)) {
            Alert::error('Error','Option not found');

            return redirect()->back();
        }

        $input['contenu'] = str_replace('true','false',$input['contenu']);

        $input['contenu'] = str_replace('input type="text"','input type="hidden"',$input['contenu']);

        $option = $this->optionRepository->update($input, $id);

        $question = $option->question;

        Alert::success('Succés','Option updated successfully.');


        $page = '';
        if (isset($input['page'])){
            $page = $input['page'];
        }


        return redirect(route('admin.certifications.questions.display', ['page' => $page,'search' => '','certification_id'=>$input['certification_id']]));

    }

    /**
     * Remove the specified Option from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return
     */
    public function destroy($id)
    {
        /*$option = $this->optionRepository->find($id);

        if (empty($option)) {
            Alert::error('Option not found');

            return redirect()->back();
        }

        $this->optionRepository->delete($id);

        Alert::success('Option deleted successfully.');

        return redirect(route('administration.options.index'));*/
    }


    public function editCustom(Request $request)
    {
        $id = $request->otion_id;
        $page = $request->page;

        $option = $this->optionRepository->find($id);

        if (empty($option)) {
            Alert::error('Error','Option not found');

            return redirect()->back();
        }

        $question = $option->question;
        $certification = $option->question->certification;

        return view('template.administration.options.edit',compact('page','certification','option','question'));
    }


}
