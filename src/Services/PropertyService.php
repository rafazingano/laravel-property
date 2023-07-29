<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Property\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyService extends Service
{

    public function __construct(Property $propert)
    {
        $this->model = $propert;
    }

    public function create(array $data)
    {
        $data = $this->dataAdjust($data);
        $data['user_id'] = Auth::id();
        $property = $this->model::create($data);
        $property->dataUpdateOrCreate($property, $data);
        return $property;
    }

    public function update($data, $id)
    {
        $property = $this->model->find($id);
        $property->update($data);
        $this->dataUpdateOrCreate($property, $data);
        return $property;
    }

    public function dataAdjust($data)
    {
        if (!isset($data['title'])) {
            $data['title'] = 'Propriedade ' . $data['code'];
        }
        if (!isset($data['slug'])) {
            $data['slug'] = Str::slug($data['title'], '-');
        }
        $data['code'] = $data['code'] ?? time();
        $data['featured'] = $data['featured'] ?? false;
        return $data;
    }

    public function dataUpdateOrCreate($property, $data)
    {
        $property->features()->sync($data['features'] ?? []);
        $property->infrastructures()->sync($data['infrastructures'] ?? []);
    }

    public function upload($property, $data)
    {
        if (isset($data['files']) && !$property->get('error')) {
            $files = [];
            $p = $property->get('obj');
            foreach ($data['files'] as $file) {
                $files[] = resolve('FileService')->upload($file, [
                    'path' => 'property/properties/files/' . $p->id,
                ]);
            }
            $p->files()->createMany($files);
        }
    }
}
