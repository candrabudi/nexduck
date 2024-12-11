<style>
    /* Game Card Styling */
    .game-card {
        background: linear-gradient(145deg, #1abc9c, #16a085);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    .game-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .game-image {
        width: 100%;
        height: 180px;
        border-radius: 15px 15px 0 0;
        object-fit: cover;
    }

    .game-name-container {
        background-color: #2c3e50;
        padding: 10px;
        border-radius: 0 0 15px 15px;
        text-align: center;
    }

    .game-name {
        font-size: 1.1rem;
        color: white;
        font-weight: bold;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .game-provider {
        font-size: 0.9rem;
        color: white;
        margin-top: 5px;
    }

    /* Popup Animation */
    .modal {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .modal.active {
        opacity: 1;
    }

    /* Responsive Grid */
    #game-cards {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        /* 6 columns on larger screens */
        gap: 20px;
        padding: 20px;
    }

    /* Responsive for Tablets */
    @media (max-width: 1024px) {
        #game-cards {
            grid-template-columns: repeat(4, 1fr);
            /* 4 columns for tablet */
        }
    }

    /* Responsive for Mobile */
    @media (max-width: 768px) {
        #game-cards {
            grid-template-columns: repeat(3, 1fr);
            /* 3 columns for mobile */
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        #game-cards {
            grid-template-columns: repeat(2, 1fr);
            /* 2 columns for very small screens */
        }
    }

    .rtp-container {
        background-color: #ecf0f1;
        border-radius: 5px;
        overflow: hidden;
        margin-top: 10px;
        height: 10px;
        position: relative;
    }

    .rtp-bar {
        background-color: #27ae60;
        height: 100%;
        transition: width 0.4s ease;
    }

    .rtp-label {
        font-size: 0.8rem;
        color: white;
        margin-top: 5px;
        text-align: center;
    }
</style>