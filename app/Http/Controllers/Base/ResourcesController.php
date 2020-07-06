<?php

namespace App\Http\Controllers\Base;

use App\Contracts\BasicResourcesInterface;
use App\Contracts\RepositoryInterface;
use App\Contracts\RequestValidatorInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @return string;
     */
    private function getCurrentEntityName()
    {
        $full_path = collect(explode("\\", get_called_class()));

        return Str::replaceFirst("Controller", "", $full_path->last());
    }

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $entities = $this->repository->all();

        $output = $this->returnByResponseType('index', $entities);

        if ($output instanceof \Illuminate\Http\JsonResponse || $output instanceof \Illuminate\View\View) {
            return $output;
        }

        return view($this->defaultViewPath . $this->getCurrentEntityName() . ".index", $this->returnedData);
    } 

    public function show($id)
    {
        $entity = $this->repository->show($id);

        $output = $this->returnByResponseType('show', $entity);

        if ($output instanceof \Illuminate\Http\Response || $output instanceof \Illuminate\View\View) {
            return $output;
        }

        return view($this->defaultViewPath . $this->getCurrentEntityName() . ".show", $this->returnedData);
    }

    public function store(RequestValidatorInterface $request)
    {
        $new_entity = $this->repository->store($request->validated());

        return $new_entity;
    }

    public function update()
    {
        # code...
    }

    public function destroy()
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
