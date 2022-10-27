<?php
require_once('nav-new-user.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Enter Data</h2>
            <form action="<?php echo FRONT_ROOT . "User/RegisterKeeper" ?>" method="POST" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input type="hidden" name="email" value="<?php echo $this->aux->getEmail() ?>">
                            <input type="hidden" name="password" value="<?php echo $this->aux->getPassword() ?>">

                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>

                            <label for="">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>

                            <label for="">Photo</label>
                            <input type="text" name="photo" class="form-control" required>

                            <label for="">DNI</label>
                            <input type="number" name="dni" class="form-control" required>

                            <label for="">Tuition</label>
                            <input type="number" name="tuition" class="form-control" required>

                            <label for="">Sex</label>
                            <select name="sex">
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="another">Another</option>
                            </select>

                            <label for="">Age</label>
                            <select name="age">
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                            </select><br><br>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
            </form>
        </div>
    </section>
</main>