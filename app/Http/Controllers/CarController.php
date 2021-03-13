<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Carro;
use Exception;
use Goutte\Client;

class CarController extends Controller
{

    public function index()
    {
        $carros = Carro::all();
        return view('home', compact('carros'));
    }



    public function store(Request $request)
    {
        $urlToScrape = 'https://www.questmultimarcas.com.br/estoque?termo=' . $request->search;

        $carros = $this->scrape($urlToScrape);

        echo '<pre>' . print_r($carros, true) . '</pre>';

        $affected_rows = null;

        foreach ($carros as $carro) {
            $user_id = auth()->user()->id;

            $car = new Carro;

            $car->user_id       = $user_id;
            $car->nome_veiculo  = $carro['nome'];
            $car->link          = $carro['link'];
            $car->ano           = preg_replace('/[^0-9]/', '', $carro['ano']);
            $car->combustivel   = $carro['combustivel'];
            $car->portas        = preg_replace('/[^0-9]/', '', $carro['portas']);
            $car->quilometragem = preg_replace('/[^0-9]/', '', $carro['quilometragem']);
            $car->cambio        = $carro['cambio'];
            $car->cor           = $carro['cor'];

            try {
                $affected_rows = $car->save();
            } catch (Exception $e) {
                return redirect('/')->with('msgError', 'Houve um erro ao inserir registros no banco de dados!');
            }
        }
        if ($affected_rows)
            return redirect('/')->with('msgSuccess', 'Adicionado com sucesso!');
        else
            return redirect('/')->with('msgInfo', "Nenhum dado encontrado com o termo " . $request->search . "!");
    }

    private function scrape($url)
    {
        $scraper = new Client();

        $data = $scraper->request('GET', $url);

        return $data->filter('.card')->each(function ($card, $i) {

            $name = $card->filter('.card__title a')->text();
            $link = $card->filter('.card__title a')->attr('href');

            $keys = array('ano', 'quilometragem', 'combustivel', 'cambio', 'portas', 'cor');

            $details = $card->filter('.card-list__info')->each(function ($detail) {
                return $detail->text();
            });

            $car_array = array_combine($keys, $details);
            $car_array['nome'] = $name;
            $car_array['link'] = $link;

            return $car_array;
        });
    }

    public function create()
    {
        return view('create');
    }

    public function destroy($id)
    {
        $carro = Carro::findOrFail($id)->delete();
        return redirect('/')->with('msgSuccess', 'Carro excluído com sucesso!');
    }

    public function edit($id)
    {
        $carro = Carro::findOrFail($id);
        return view('edit', compact('carro'));
    }

    public function update(Request $request)
    {
        $carro = Carro::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('msgSuccess', 'Carro alterado com sucesso!');
    }
}
