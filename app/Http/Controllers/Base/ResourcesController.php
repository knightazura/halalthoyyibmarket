<?php

namespace App\Http\Controllers\Base;

use App\Contracts\BasicResourcesInterface;
use App\Contracts\RepositoryInterface;
use App\Contracts\RequestValidatorInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ResourcesController extends Controller implements BasicResourcesInterface
{
    /**
     * Repository property that will bind with current requested model
     * 
     * @var \Sindria\Repositories\{any}
     */
    protected $repository;

    /**
     * List pairs of resource methods and their custom method on repositories
     * i.e Format: ['index' => 'activeCustomers']
     * 
     * @var array
     */
    protected $repositoryMethod = [];

    /**
     * List pairs of resource methods and their custom views
     * i.e Format: ['index' => 'pages.global.index']
     * 
     * @var array
     */
    protected $returnedView = [];

    /**
     * List pairs of data that will returned
     * i.e Format: ['current_day' => date('D')]
     * 
     * @var array
     */
    protected $returnedData = [];

    /**
     * Default root path for view
     * 
     * @var string
     */
    private $defaultViewPath = "pages.";

    /**
     * Get model or entity name based on it's controller name
     * 
     * @return string
     */
    private function getCurrentEntityName()
    {
        $full_path = collect(explode("\\", get_called_class()));

        return Str::replaceFirst("Controller", "", $full_path->last());
    }

    /**
     * Default view of entity for every basic resources
     * 
     * @param  string  $page
     * @return string
     */
    private function defaultEntityViewPath($page)
    {
        return $this->defaultViewPath . $this->getCurrentEntityName() . "." . $page;
    }

    /**
     * Check returned response
     * 
     * @param  mixed  $output
     * @return bool
     */
    private function checkOutputInstance($output)
    {
        return $output instanceof \Illuminate\Http\JsonResponse || $output instanceof \Illuminate\View\View;
    }

    /**
     * Return a proper response according to request
     * 
     * @param  mixed  $output
     * @param  string  $view
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    private function returnedInstance($output, $view)
    {
        return ($this->checkOutputInstance($output))
            ? $output
            : view($this->defaultEntityViewPath($view), $this->returnedData);
    }

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $entities = $this->repository->all();

        $output = $this->returnByResponseType('index', $entities);

        return $this->returnedInstance($output, 'index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  any  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $entity = $this->repository->show($id);

        $output = $this->returnByResponseType('show', $entity);

        return $this->returnedInstance($output, 'show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function store(RequestValidatorInterface $request)
    {
        $new_entity = $this->repository->store($request->validated());

        $output = $this->returnByResponseType('store', $new_entity);

        return $this->returnedInstance($output, 'index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @param  any  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function update(RequestValidatorInterface $request, $id)
    {
        $updated_entity = $this->repository->update($id, $request->validated());

        $output = $this->returnByResponseType('store', $updated_entity);

        return $this->returnedInstance($output, 'show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  any  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function destroy($id)
    {
        # code...
    }

    /**
     * Set custom repository method for each designated basic resources method
     * 
     * @param string $methodName
     * @param string $repositoryMethod
     */
    protected function setRepositoryMethod($methodName, $repositoryMethod)
    {
        $this->repositoryMethod[$methodName] = $repositoryMethod;
    }

    protected function returnByResponseType($methodName, $data)
    {
        $this->setReturnData(Str::lower($this->getCurrentEntityName()), $data);

        if (request()->ajax()) {
            return response()->json($data);
        }

        if (isset($this->returnedView[$methodName])) {
            return view($this->returnedView[$methodName], $this->returnedData);
        }
    }

    /**
     * Set custom view that will used as response of each designated basic resources method
     * 
     * @param string $methodName
     * @param string $view
     */
    protected function setReturnView($methodName, $view)
    {
        $this->returnedView[$methodName] = $view;
    }

    /**
     * Set custom data that will added into response
     * 
     * @param string $variableName
     * @param string $view
     */
    protected function setReturnData($variableName, $data)
    {
        $this->returnedData[$variableName] = $data;
    }
}
