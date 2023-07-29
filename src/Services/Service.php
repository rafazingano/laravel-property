<?PHP

namespace ConfrariaWeb\Property\Services;

class Service
{

    protected $model;

    public function orderBy($by = 'id', $order = 'DESC')
    {
        $this->model = $this->model->orderBy($by, $order);
        return $this;
    }

    public function where($collunn, $value)
    {
        $this->model = $this->model->where($collunn, $value);
        return $this;
    }

    public function paginate($take = 15)
    {
        return $this->model->paginate($take);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $property = $this->model->create($data);
        return $property;
    }

    public function update($data, $id)
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
