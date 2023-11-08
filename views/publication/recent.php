
<section id="main">
    <div id="menu-main">
        <ul>
            <li>Community</li>
            <li>Trending</li>
            <li>Latest</li>
        </ul>
        <ul>
            <li>All</li>
            <li>2D</li>
            <li>3D</li>
        </ul>
        <div>All media</div>
    </div>
    <div id="content-main">
        <?php while($pub = $recent_publications -> fetch_object()): ?>
            <?php if(!empty($pub->img)): ?>
                <?php $preview_image = json_decode($pub->img, true)[0];?>
                <div class="image">
                    <?php $src = base_url."uploads/publications/$pub->id/".$preview_image['filename']; ?>
                    <?php $image_size = getimagesize($src); ?>
                    <a href="<?=base_url?>publication/detail&id=<?=$pub->id?>" style="display:block; width: 100%; background: url('<?=$src?>'); background-size: cover; background-position: center;" >
                    <span class="display-title" style="color: white;
                        background-color: #0000009e;
                        position: relative;
                        top: 80%;
                        width: 80%;
                        padding-top: 18px;
                        padding-bottom: 20px;
                        font-size: larger;
                        text-transform: uppercase;
                        padding-right: 100%;
                        text-align: right;
                        animation-name: title-appears;
                        animation-duration: 300ms
                        "><?=$pub->title?></span>
                    </a>
                    
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        <div class="image">
            <img src="<?=base_url?>assets/resources/img/michael-johnson-forest.jpg" alt="michael johnson extraterrestial forest">
        </div>
        <div class="image">
            <img src="<?=base_url?>assets/resources/img/michael-johnson-ship.jpg" alt="michael johnson spatial ship">
        </div>
        <div class="image">
            <img src="<?=base_url?>assets/resources/img/space.jpg" alt="michael johnson space fleet">
        </div>
        <div class="image">
            <img src="<?=base_url?>assets/resources/img/ice.jpg" alt="michael johnson ice glaciars">
        </div>
        <div class="image">
            <img src="<?=base_url?>assets/resources/img/michael-johnson-storm.jpg" alt="michael johnson space storm" />
        </div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
        <div class="image"></div>
    </div>
    <div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet urna ipsum, gravida egestas justo
            blandit quis. Morbi gravida diam a dictum pulvinar. Morbi suscipit orci in ornare vulputate. Donec id semper
            augue. Etiam eget congue lectus, et aliquet diam. Donec et purus arcu. Suspendisse non arcu dictum,
            pellentesque magna sed, malesuada dui. Proin laoreet nibh non sapien tincidunt pharetra. Curabitur vitae
            diam porttitor, mattis nulla non, aliquam massa. Sed ultrices congue luctus. Donec arcu nisl, tristique nec
            euismod id, ultricies vel nisi. Phasellus pharetra dolor sit amet orci viverra dapibus. Aenean eget euismod
            leo. Suspendisse potenti. Quisque iaculis ipsum et tortor suscipit, eget malesuada lorem rutrum.
        </p>
        <p>
            Phasellus a porta justo. Proin tempor scelerisque magna nec tincidunt. Cras fringilla neque vel tellus
            molestie vestibulum. Maecenas massa tortor, mattis sollicitudin dui nec, ornare ornare eros. Mauris
            elementum, dolor sit amet volutpat suscipit, tellus urna interdum ex, in varius sem nunc at nisl. Nam id
            imperdiet est, a lacinia magna. Pellentesque auctor nisl a risus vulputate cursus. Fusce at egestas urna.
            Nunc sit amet tellus augue. Vestibulum et laoreet est, at accumsan elit. Nullam mattis posuere efficitur.
            Vivamus felis quam, elementum id nibh nec, faucibus aliquam nisi. Pellentesque congue, justo at consequat
            sodales, justo felis imperdiet risus, a aliquet ante nibh quis nisl.
        </p>
        <p>
            Suspendisse nisi dolor, lobortis sit amet risus vel, vehicula fermentum odio. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Ut varius ligula a lectus molestie, vitae facilisis odio mollis. Nam non urna
            mauris. Integer purus magna, dignissim id rhoncus eget, pharetra suscipit enim. Vestibulum porttitor massa
            ac orci efficitur volutpat. Maecenas vel nisl at dolor luctus varius. Curabitur cursus facilisis nulla sed
            interdum.
        </p>
        <p>
            Aliquam vel interdum ipsum. Cras a sem ligula. Cras ut velit lorem. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Nulla in consequat est. Fusce dictum eleifend ipsum, id molestie augue placerat
            sit amet. Nullam finibus risus ante, at porta dui aliquam a. Nulla et metus ac lectus molestie mattis.
        </p>
        <p>
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.
            Nullam tincidunt ultricies lectus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et
            netus et malesuada fames ac turpis egestas. In pharetra turpis eu metus dapibus, sed lobortis enim sagittis.
            In tincidunt quis quam vel pellentesque. Sed a lectus vestibulum, imperdiet ex a, pulvinar magna. Vivamus
            vitae lacus vitae justo cursus dignissim. Duis vitae dolor laoreet, pellentesque dolor vitae, sodales
            mauris. Aliquam ullamcorper ex et gravida ornare.s
        </p>
    </div>
    <div id="slider">
        <div id="slider-img-div">
            <img id="img-slider" src="<?=base_url?>assets/resources/img/z.png" alt="z" />
        </div>
        <div id="scroll-slider">
            <div class="slider-button" style="background-color: #13AFF0;" ></div>
            <div class="slider-button" style="background-color: white;" ></div>
            <div class="slider-button" style="background-color: white;" ></div>
            <div id="lock">
                <div>Lock:</div>
                <input id="lock-checkbox" type="checkbox" />
            </div>
            <input id="counter" type="text" style="display: none;" />
        </div>
    </div>
</section>
